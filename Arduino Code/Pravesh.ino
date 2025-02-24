#include <WiFiS3.h>
#include <ArduinoHttpClient.h>
#include <SPI.h>
#include <MFRC522.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>

// Define constants
#define RED_LED_PIN 1
#define GREEN_LED_PIN 2
#define BLUE_LED_PIN 3
#define BUZZER_PIN 5 // Define the buzzer pin

String URL = "http://192.168.104.160/rfidattendance/test_data.php";
const char* ssid = "kk"; // Your WiFi network name
const char* password = "12345678"; // Your WiFi password

#define RST_PIN 9
#define SS_PIN 10

MFRC522 rfid(SS_PIN, RST_PIN); // Create MFRC522 instance
WiFiClient wifiClient; // Create WiFiClient instance
HttpClient client = HttpClient(wifiClient, "192.168.104.160", 80); // Use IP and port for the server

// Initialize LCD with I2C address (0x27 is common, but check your LCD's documentation)
LiquidCrystal_I2C lcd(0x27, 16, 2); // 16 columns, 2 rows

void setup() {
  Serial.begin(115200);
  SPI.begin();    
  rfid.PCD_Init();    // Initialize MFRC522
  Serial.println("RFID Reader initialized.");

  // Initialize LED pins
  pinMode(RED_LED_PIN, OUTPUT);
  pinMode(GREEN_LED_PIN, OUTPUT);
  pinMode(BLUE_LED_PIN, OUTPUT);
  pinMode(BUZZER_PIN, OUTPUT); // Initialize buzzer pin

  // Initialize LEDs to off
  digitalWrite(RED_LED_PIN, HIGH);
  digitalWrite(GREEN_LED_PIN, LOW);
  digitalWrite(BLUE_LED_PIN, LOW);
  digitalWrite(BUZZER_PIN, LOW); // Initialize buzzer to off

  // Initialize LCD
  lcd.init();
  lcd.backlight(); // Turn on LCD backlight
  lcd.clear();

  // Display initial message
  lcd.setCursor(0, 0);
  lcd.print("WiFi Connecting..");
  
  // Connect to WiFi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
  }

  Serial.println("\nConnected to WiFi!");
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("WiFi Connected");
  delay(2000); // Wait before starting the loop
}

void loop() {
  if (WiFi.status() != WL_CONNECTED) {
    // If not connected to Wi-Fi, display "WiFi not connected"
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("WiFi not connected");
    digitalWrite(RED_LED_PIN, HIGH);  // Red LED on
    digitalWrite(GREEN_LED_PIN, LOW);
    digitalWrite(BLUE_LED_PIN, LOW);
    return;
  } else {
    // If connected to Wi-Fi, display "Scan your card"
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("Scan your card");
    digitalWrite(RED_LED_PIN, LOW);
    digitalWrite(GREEN_LED_PIN, HIGH); // Green LED on
    digitalWrite(BLUE_LED_PIN, LOW);
  }

  // Look for new RFID tags
  if (!rfid.PICC_IsNewCardPresent() || !rfid.PICC_ReadCardSerial()) {
    return;
  }

  // Read UID
  String uid = "";
  for (byte i = 0; i < rfid.uid.size; i++) {
    if (rfid.uid.uidByte[i] < 0x10) {
      uid += "0"; // Add leading zero if needed
    }
    uid += String(rfid.uid.uidByte[i], HEX);
  }

  // Print the UID
  Serial.print("UID tag: ");
  Serial.println(uid);

  // Display "Wait" on LCD and turn on blue LED and buzzer when tag is read
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Wait");
  digitalWrite(BLUE_LED_PIN, HIGH); // Blue LED on
  digitalWrite(BUZZER_PIN, HIGH);   // Buzzer on

  // Send UID to server
  String postData = "uid=" + uid;
  client.beginRequest();
  client.post("/rfidattendance/test_data.php");
  client.sendHeader("Content-Type", "application/x-www-form-urlencoded");
  client.sendHeader("Content-Length", postData.length());
  client.beginBody();
  client.print(postData);
  client.endRequest();

  int statusCode = client.responseStatusCode();
  String response = client.responseBody();

  Serial.print("Status code: ");
  Serial.println(statusCode);
  Serial.print("Response: ");
  Serial.println(response);
  Serial.println("------------------------------------------");

  // After sending UID, turn off blue LED, buzzer, and display "Thank you"
  digitalWrite(BLUE_LED_PIN, LOW);
  digitalWrite(BUZZER_PIN, LOW);
  digitalWrite(GREEN_LED_PIN, HIGH); // Green LED back on
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Thank you");
  delay(2000); // Show "Thank you" for 2 seconds

  // Display "Scan your card" again
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Scan your card");

  // Halt PICC
  rfid.PICC_HaltA();
  // Stop encryption on PCD
  rfid.PCD_StopCrypto1();

  delay(5000); // Short delay to prevent rapid switching
}
