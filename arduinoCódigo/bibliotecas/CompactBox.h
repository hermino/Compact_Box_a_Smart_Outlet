#include <SoftwareSerial.h>

#define TX 2 // arduino RX
#define RX 3 // arduino TX
SoftwareSerial ESPserial(TX, RX);      // RX, TX ESP8266

boolean DEBUG = true;

// === FUNÇÕES ===
void serialESPInitialize();
String sendToESP(String command, const int timeout);
String sendData(String IDdispositivo, float valorSensor);
int getStatus(String mensagem);

/*
* Nome: serialESPInitialize
* Descrição: Função utilizada inicializar o serial do ESP8266 (definido para 9600)
* Params: *SoftwareSerial ESPserial     - Serial do ESP;
* Returns: 
*/
void serialESPInitialize(){
	ESPserial.begin(9600);
	while (!ESPserial) {
		;
	}
	sendToESP("AT+CWMODE=1"                          , 500);
    sendToESP("AT+CIPMUX=1"                          , 500);
    sendToESP("AT+CWJAP=\"FamCatao\",\"M@R1A2O16\"", 12000);
}


/*
* Nome: sendToESP
* Descrição: Função utilizada para enviar comandos ao ESP8266.
* Params: *SoftwareSerial ESPserial  - Serial do ESP
*         *String         command    - O dado/comando a ser enviado; 
          *int            timeout    - Tempo de espera da resposta;
* Returns: A resposta do ESP8266 se DEBUG = true.
*/
String sendToESP(String command, const int timeout){
  String response = "";
  ESPserial.println(command);
  long int time = millis();
  while( (time+timeout) > millis()){
    while(ESPserial.available()){
      char c = ESPserial.read();
      response+=c;
    }  
  }
  if(DEBUG){
    Serial.println(response);
  }
  return response;
}


/*
* Nome: sendData
* Descrição: Função utilizada para enviar dados do sensor ao WebServer.
* Params: *String IDdispositivo - ID do dispositivo que está enviando os dados;
          *float  valorSensor   - Valor atual detectado pelo sensor.
* Returns: A resposta da página PHP para o estado do dispositivo (ON/OFF)
*/
String sendData(String IDdispositivo, float valorSensor){
  sendToESP("AT+CIPSTART=1,\"TCP\",\"www.compactbox.tk\",80",2000);
  
  String GETrequest1 =  "GET /compactbox/getDispositivo.php?IDdisp="; // 42
		 GETrequest1 += IDdispositivo;                                // 8
		 GETrequest1 += "&valor=";                                    // 7
		 GETrequest1 += String(valorSensor);                          // 4 = 61
  String GETrequest2 =  " HTTP/1.0\r\n";                             // 13
         GETrequest2 += "Host: \"www.compactbox.tk\"\r\n";           // 31
         GETrequest2 += "Connection: close";                         // 17 = 61
  
  sendToESP("AT+CIPSEND=1,122", 300);
  sendToESP(GETrequest1      , 300);
  sendToESP(GETrequest2      , 300);
  
  return sendToESP("AT", 1000);
}


/*
* Nome: sendData
* Descrição: Função utilizada para enviar dados do sensor ao WebServer.
* Params: *String IDdispositivo - ID do dispositivo que está enviando os dados;
          *float  valorSensor   - Valor atual detectado pelo sensor.
* Returns: A resposta da página PHP para o estado do dispositivo (ON/OFF)
*/
int getStatus(String mensagem){
  int i;
  char valorStatus = "";
  for(i=0; mensagem[i] != '\0' ; i++){
    if(mensagem[i] == '{'){
	  valorStatus = mensagem[++i];
	  if(valorStatus == '1'){
		return 1;
	  }else if(valorStatus == '0'){
		return 0;
	  }
    }
  }
  return -1;
}