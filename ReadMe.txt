⭐ Project Title : "PRAVESH - Smart Entry-Exit System"

⭐ YouTube Video Link : https://youtu.be/IVIbOu4JvdQ

⭐ Components Used :
    ➤ Arduino Uno R4 WiFi 
    ➤ RC522 RFID Card Reader Module 13.56MHz
    ➤ RFID 13.56MHz Card and 13.56MHz RFID IC Key Tag
    ➤ RGB Led
    ➤ 5V Passive Buzzer	
    ➤ LCD1602 Parallel LCD Display with IIC/I2C interface
    ➤ IIC/I2C Serial Interface Adapter Module

⭐ Impact Statement : (About the project in brief)
    ➤PRAVESH is an innovative RFID-enabled Smart Entry-Exit System developed to streamline entry and exit processes, aimed at replacing the current manual logbook method, which is time-consuming and prone to errors. 
    ➤By using RFID cards, students experience quick, hassle-free access without the need for manual entries, reducing delays and promoting accountability. ➤The administration benefits significantly, with PRAVESH enabling paperless operations, efficient record management and real-time reporting Built with the Arduino UNO R4 WiFi micro-controller, which provides internet connectivity, and a custom frontend interface, PRAVESH logs each student’s entry and exit with details such as time, date, and personal information. The system also triggers an automated form email for visit purposes, streamlining the process further. 
    ➤We take pride in PRAVESH’s potential to modernize campus operations, improve security, and greatly enhance convenience for students.

⭐ Circuit Diagram Explanation :
    ❖ For Power Input, 
        ➤ I am currently using my laptop which is connected using a usb cable. We can also use a 2S Li-ion battery pack, which provides an average voltage of 7.4V. This is connected to the Vin pin and ground of the Arduino UNO Board.
    ❖ For the RFID Scanner module:
        ➤ SDA pins of the RFID Scanner are connected to the pin 10 of Arduino Uno R4 Wi-Fi.
        ➤ SCK pin is connected to pin 13 of Arduino Uno R4 Wi-Fi.
        ➤ MOSE pin is connected to pin 11 of  Arduino Uno R4 Wi-Fi.
        ➤ MISO pin is connected to pin 12 of Arduino Uno R4 Wi-Fi.
        ➤ Ground is connected to the ground of  Arduino Uno R4 Wi-Fi.
        ➤ Reset pin is connected to pin 9 of  Arduino Uno R4 Wi-Fi.
        ➤ 3.3V power supply pin is connected to 3.3V pin of  Arduino Uno R4 Wi-Fi.
    ❖ For the buzzer 
        ➤ The ground is given as common ground between the resistor and RGB LED.
        ➤ Pin of Buzzer is connected to pin 5 of  Arduino Uno R4 Wi-Fi.
    ❖ For RGB LED Light : 
        ➤ The red point of RGB Led goes to pin 3 of  Arduino Uno R4 Wi-Fi. 
        ➤ Respective blue wire of RGB goes to pin 2 and 
        ➤ Green wire goes to pin 1 of Arduino Uno R4 Wi-Fi.
        ➤ The common ground pin of RGB LED is connected to ground pin of Arduino Uno R4 Wi-Fi with a resistor in-between.
    ❖ For LCD Display : 
        ➤ The SDA pin of the I2C module is connected to pin A4 of Arduino Uno R4 Wi-Fi.
        ➤ The SCL pin of the I2C module is connected to pin A5 of Arduino Uno R4 Wi-Fi.
        ➤ The VCC pin of the I2C module is connected to 5 Volt output pin of Arduino Uno R4 Wi-Fi.
        ➤ The ground pin of the I2C module is connected to ground pin of Arduino Uno R4 Wi-Fi.

⭐ Working Demonstration Walkthrough : 
    ➤ Not Connected to Wi-Fi (LED is Red), the screen shows “WiFi Connecting”.
    ➤ Connect to Wi-Fi, screen displays "Wi-Fi Connected".
    ➤ Connected to Wi-Fi (LED Turning Green signifying the system is ready to be used), also screen displays “Scan your card”.
    ➤ RFID Scanned and sending UID to the server (Screen Showing “Wait”, signifying wait time before tapping the next rfid card). On successful scanning the screen shows "Thank You" for confirmation.
    ➤RFID Scanned Successfully, display shows "Scan Your Card" signifying the system is ready to be used again.

⭐Working of the RFID Wi-Fi Access Control System
    ➤This project functions as an RFID-based access control system that uses an Arduino Uno R4 Wi-Fi to connect to a server, send card uid, and provide real-time feedback using LEDs, display and a buzzer. The system operates as follows:
    ❖ Setup and Initialization: 
        ➤Upon powering on, the Arduino Uno R4 Wi-Fi connects to the configured Wi-Fi network. If connected successfully, the green LED turns on and the display shows “Scan your card” to indicate network readiness. Meanwhile, the RFID reader (MFRC522) and other output components are also initialized.
    ❖ Wi-Fi Status Check: 
        ➤In each loop iteration, the Arduino Uno R4 Wi-Fi checks its Wi-Fi connection status. If disconnected, the red LED lights up to signal this, also the screen shows “WiFi connecting..”. Once Wi-Fi reconnects, the red LED turns off and the green LED turns back on, the screen now shows “WiFi connected”.
    ❖ RFID Tag Detection: 
        ➤The RFID reader continuously scans for new RFID tags. When a tag is detected, the reader retrieves the UID, a unique identifier for each tag. This UID is converted to a string for easy transmission.
    ❖ Visual and Audio Feedback: 
        ➤Upon detecting an RFID tag, the system lights up the LED and activates the buzzer, also the screen changes to “wait” indicating wait time between two rfid scans. This provides an immediate indication to the user that their tag has been scanned.
    ❖ Data Transmission to Server: 
        ➤The UID is sent to the server using an HTTP POST request. The server URL is predefined, and the UID data is posted to the endpoint /rfidattendance/test_data.php. The server response status and body are printed to the Serial Monitor for debugging and confirmation.
    ❖ Completion and Reset: 
        ➤After the UID is successfully sent, the system changes the “wait” display to “scan your card”, readying the system for the next scan. The RFID reader halts communication with the card to conserve power until the next tag is detected.
    ❖ Email functionality: 
        ➤During the Data Transmission to Server step , the uid is also matched to the email of respective person and an form is sent to the registered email id of the person with the reason for visit and return time estimate thing , after the user fills that and submits the form , it automatically updates at the database .
    ❖ Delay and Repeat: 
        ➤A short delay prevents the system from reading the same card multiple times too quickly. The system then loops back to check for Wi-Fi status and new RFID tags, maintaining continuous operation.