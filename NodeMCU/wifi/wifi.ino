#include <SoftwareSerial.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <ArduinoJson.h>


void check_user(String user_id);

//String result;
String payload;

HTTPClient http;
WiFiClient client;
SoftwareSerial ArduinoUno(D2,D3);
ESP8266WiFiMulti WiFiMulti;
 
void setup() {
  // Initialize Serial port
  Serial.begin(9600);
  ArduinoUno.begin(9600);

  while (!Serial) continue;

  for (uint8_t t = 4; t > 0; t--) {
    Serial.printf("[SETUP] WAIT %d...\n", t);
    Serial.flush();
    delay(1000);
  }
//Edit Wifi name and password
  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("wifi name", "password");
 
}
 
void loop() {
 StaticJsonBuffer<1000> jsonBuffer;
  JsonObject& root = jsonBuffer.parseObject(ArduinoUno);
  if (root == JsonObject::invalid())
    return;

  String data1=root["order"];
  if(data1 == "send_values"){
    int data1=root["ldr"];
    int data2=root["flame"];
    int data3=root["ir"];
    int data4=root["ir2"];
    int data5=root["ir3"];
    int data6=root["ir4"];
    int data7=root["smoke"];
    float data8=root["temp"];
    int data9=root["fan"];
    int data10=root["buzz"];
    int data11=root["light"];
      Serial.println(data10);
      check_fan();
    check_user(data1,data2,data3,data4,data5,data6,data7,data8,data9,data10,data11);
    
  }
  
}
void check_fan(){
   // wait for WiFi connection
  if ((WiFiMulti.run() == WL_CONNECTED)) {
    Serial.println("Wifi Connected");
    

    // HTTPClient http; // Causes one time response
    
    Serial.print("[HTTP] begin...\n");
    if (http.begin(client, "http://157.230.245.56/syed/dummy/check_fan.php")) {  

      Serial.print("[HTTP] GET...\n");
      // start connection and send HTTP header
      int httpCode = http.GET();

      // httpCode will be negative on error
      if (httpCode > 0) {
        // HTTP header has been send and Server response header has been handled
        Serial.printf("[HTTP] GET... code: %d\n", httpCode);

        // file found at server
        if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY) {
          payload = http.getString();
          Serial.println(payload);
          ArduinoUno.println(payload);
          Serial.println();
        }
      } else {
        Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
      }

      http.end();
    } else {
      Serial.printf("[HTTP} Unable to connect\n");
    }
  }
}
void check_user(int ldr, int flame, int ir, int ir2, int ir3, int ir4, int smoke, float temp, int fan, int buzz, int light){
    // wait for WiFi connection
  if ((WiFiMulti.run() == WL_CONNECTED)) {
    Serial.println("Wifi Connected");
    

    // HTTPClient http; // Causes one time response
    
    Serial.print("[HTTP] begin...\n");
    
  if (http.begin(client, "http://157.230.245.56/syed/SmartHouse/accept.php?flame=" + String(flame) + "&light=" + String(ldr) + "&ir1=" + String(ir) + "&ir2=" + String(ir2) + "&ir3=" + String(ir3) + "&ir4=" + String(ir4) + "&smoke=" + String(smoke) + "&temp=" + String(temp) + "&fan=" + String(fan) + "&buzz=" + String(buzz) + "&light=" + String(light))) {
      Serial.print("[HTTP] GET...\n");
      // start connection and send HTTP header
      int httpCode = http.GET();

      // httpCode will be negative on error
      if (httpCode > 0) {
        // HTTP header has been send and Server response header has been handled
        Serial.printf("[HTTP] GET... code: %d\n", httpCode);

        // file found at server
        if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY) {
          payload = http.getString();
          Serial.println(payload);
       
        }
      } else {
        Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
      }

      http.end();
    } else {
      Serial.printf("[HTTP} Unable to connect\n");
    }
  }
}
