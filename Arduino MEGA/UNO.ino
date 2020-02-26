#include <SoftwareSerial.h>
#include <ArduinoJson.h>
#define arraySize 32
#include <LCD.h>
#include <LiquidCrystal.h>
#include <LiquidCrystal_I2C.h>
#include <Wire.h>

 
LiquidCrystal_I2C lcd(0x27, 2, 1, 0, 4, 5, 6, 7, 3, POSITIVE);
char inData[arraySize];
char y[arraySize];
void sendValues(String tsdf);

SoftwareSerial NodeMCU(11,12);

int response;
int ldr_pin0 = 23;
int ldrled_pin0 = 25;
int flamesensvalue0 = 0;
int flame_pin0 = A2;
int fled_pin0 = 28;
int threshold0 = 200;
int buzpin = 48;
int buzpin1 = 47;
int ir_pin0 = 22; 
int irled_pin0 = 24;
int ir_pin1 = 52; 
int irled_pin1 = 53;
int ir_pin2 = 50; 
int irled_pin2 = 51;
int ir_pin3 = 26; 
int irled_pin3 = 27;
int iro0 = HIGH;
int iro1 = HIGH;
int iro2 = HIGH;
int iro3 = HIGH;
int smoke = A1;
int sensorThres0 = 400;
int smrled_pin0 = 29;
int Vo;
float R1 = 2252;
float logR2, R2, T;
float A = 1.484778004e-03, B = 2.348962910e-04, C = 1.006037158e-07;
int ThermistorPin = A0;
int fan = 49;
int buzz;
int a_light;
int control = 1;
  
void setup() {
  pinMode(ldr_pin0,INPUT);
  pinMode(flame_pin0,INPUT);
  pinMode(fled_pin0,OUTPUT);
  pinMode(ldr_pin0,INPUT);
  pinMode(ldrled_pin0,OUTPUT);
  pinMode(ir_pin0,INPUT);
  pinMode(irled_pin0,OUTPUT);
  pinMode(ir_pin1,INPUT);
  pinMode(irled_pin1,OUTPUT);
  pinMode(ir_pin2,INPUT);
  pinMode(irled_pin2,OUTPUT);
  pinMode(ir_pin3,INPUT);
  pinMode(irled_pin3,OUTPUT);
  pinMode(smoke,INPUT);
  pinMode(smrled_pin0,OUTPUT);
  pinMode(buzpin,OUTPUT);
  pinMode(buzpin1,OUTPUT);
  pinMode(fan,OUTPUT);
  digitalWrite(fan,HIGH);
  Serial.begin(9600);
  NodeMCU.begin(9600);
  Serial.println("setup");
lcd.begin(16,2);
lcd.backlight();

}
 
void loop() {
  lcd.setCursor(2,0);
  lcd.print("TEMPERATURE:");
  TEMP();
  lcd.setCursor(5,1);
  lcd.print(T);
  lcd.print((char)223);
  lcd.print("C");
  delay(3000);
  Serial.println("loop");
  float temp = TEMP();
  int ldr = LDR(control);
  int flame = FLAME();
  int ir = IR();
  int ir1 = IR1();
  int ir2 = IR2();
  int ir3 = IR3();
  int smoke = SMOKE();
  int fan = FAN(control);
   if(buzpin == HIGH){
    buzz = 1;
  }else{
    buzz = 0;
  }
  if(fled_pin0 == HIGH){
    a_light = 1;
    }else{
      a_light = 0;
    }
    Serial.println(buzz);
    Serial.println(a_light);
  Serial.print("light ");
  Serial.println(ldr);
  Serial.print("flame ");
  Serial.println(flame);
  control = sendValues(ldr,flame,ir,ir1,ir2,ir3,smoke,temp,fan,buzz,a_light);
  Serial.println("control");
  Serial.println(control);
}



int sendValues(int ldr2,int flame2,int ir, int ir1, int ir2, int ir3, int smoke, float temp, int fan, int buzz, int a_light){
  StaticJsonBuffer<1000> jsonBuffer;
  JsonObject& root = jsonBuffer.createObject();
  root["order"] = "send_values";
  root["ldr"] = ldr2;
  root["flame"] = flame2;
  root["ir"] = ir;
  root["ir2"] = ir1;
  root["ir3"] = ir2;
  root["ir4"] = ir3;
  root["smoke"] = smoke;
  root["temp"] = temp;
  root["fan"] = fan;
  root["buzz"] = buzz;
  root["light"] = a_light;
  root.printTo(NodeMCU);
  Serial.println("Data Sent ...");
  if(NodeMCU.available()){
    Serial.println("Response available ...");
  }
  response = NodeMCU.parseInt();
  Serial.println(response);
  if(response==1){
    Serial.println("fan and light is off");
    
    }
  else if(response==2){
    Serial.println("fan off and light  on");
  }
   else if(response==3){
    Serial.println("fan on and light  off");
  }
   else if(response==4){
    Serial.println("fan on and light  on");
  }
    
    else{
     Serial.println("Error occur"); 
    }
  return response;
}

int LDR(int ctrl){
  int value;
   if( digitalRead(ldr_pin0) == 1 || ctrl == 2 || ctrl == 4 || ctrl > 4){
     digitalWrite(ldrled_pin0, HIGH);
      value = 1;
      
     
   }else if(ctrl == 0){
    digitalWrite(ldrled_pin0, HIGH);
    value = 1;
    
    }
   else{
    digitalWrite(ldrled_pin0, LOW);
      value = 0;
   }
         delay(10);

   return value;
}
int FLAME(){
  int value;
  flamesensvalue0 = analogRead(flame_pin0);
  if(flamesensvalue0 <= threshold0)
  {
    digitalWrite(fled_pin0,HIGH);
    tone(buzpin,1000);
    value = 1;
  
  }
  else
  {
    digitalWrite(fled_pin0,LOW);
    noTone(buzpin);
     value = 0;
    
  }
  delay(10);
  return value;
}
int IR(){
  int value;
  iro0 = digitalRead(ir_pin0);
  if(iro0 == LOW)
  {
    digitalWrite(irled_pin0, HIGH);
    tone(buzpin1,1000);
    value = 1;
    
  }
  else
  {
    digitalWrite(irled_pin0, LOW);
     noTone(buzpin1);
    value = 0;
  }
  delay(10);
  return value;
}
int IR1(){
  int value;
  iro1 = digitalRead(ir_pin1);
    //tone(buzpin1,1000);
  if(iro1 == LOW)
  {
    digitalWrite(irled_pin1, HIGH);
    value = 1;
    
  }
  else
  {
    digitalWrite(irled_pin1, LOW);
    value = 0;
  }
  delay(10);
  return value;
}
int IR2(){
  int value;
  iro2 = digitalRead(ir_pin2);
  if(iro2 == LOW)
  {
    digitalWrite(irled_pin2, HIGH);
   // tone(buzpin1,1000);
    value = 1;
    
  }
  else
  {
    digitalWrite(irled_pin2, LOW);
    value = 0;
  }
  delay(10);
  return value;
}
int IR3(){
  int value;
  iro3 = digitalRead(ir_pin3);
  if(iro3 == LOW)
  {
    digitalWrite(irled_pin3, HIGH);
   // tone(buzpin1,1000);
    value = 1;
    
  }
  else
  {
    digitalWrite(irled_pin3, LOW);
    value = 0;
  }
  delay(10);
  return value;
}

int SMOKE(){
  int analogSensor = analogRead(smoke);
  int value;
  if(analogSensor > sensorThres0)
  {
    digitalWrite(smrled_pin0,HIGH);
    tone(buzpin,1000);
    value=1;
  }
  else
  {
    digitalWrite(smrled_pin0,LOW); 
    noTone(buzpin); 
    value=0;  
  }
  delay(10);
  return value;
}
float TEMP()
{
Vo = analogRead(ThermistorPin);
R2 = R1* (1023.0 / (float)Vo - 1.0);
logR2 = log(R2);
T = (1.0 / (A + B*logR2 + C*logR2*logR2*logR2));
T =  -(T + 265.15 - 589); 
return T;
}
int FAN(int ctrl){
  int value;
  if(T>26.19 || ctrl == 3 || ctrl == 4)
  {
    digitalWrite(fan,LOW);
    value = 1;
   
  }else if(T>26.19 && (ctrl == 1 || ctrl == 2)){
    digitalWrite(fan,HIGH);
    value = 0;
    
    }
    else if(ctrl == 0){
    digitalWrite(fan,HIGH);
    value = 0;
    
    }
  else
  {
    digitalWrite(fan,HIGH);
    value = 0;

  }
  return value;
}
