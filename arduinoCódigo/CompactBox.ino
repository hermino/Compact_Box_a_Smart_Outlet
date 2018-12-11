#include "bibliotecas/CompactBox.h"
#include <ACS712.h>

String IDdispositivo = "YRB16WOG";
boolean statusDisp = false;
int statusAtual = 0;

ACS712 sensorCorrente(ACS712_30A, A0);
int portaRele = 7;

void setup()
{
  Serial.begin(9600);
  while (!Serial) {
    ;
  }

  pinMode(portaRele,OUTPUT);  //set build in led as output
  digitalWrite(portaRele, statusDisp);
  
  delay(500);
  Serial.println("Aguarde. Calibrando ACS712...");
  sensorCorrente.calibrate();
  Serial.println("Fim da calibração");
  delay(1000);
  
  serialESPInitialize();
  
}

void loop(){
  long int time = millis();
  float corrente = sensorCorrente.getCurrentAC(60);
 
  String mensagem = sendData(IDdispositivo, corrente);
  int novoStatus = getStatus(mensagem);
  if(novoStatus != statusAtual && novoStatus != -1){
    statusDisp = !statusDisp;
    digitalWrite(portaRele, statusDisp);
    statusAtual = novoStatus;
  }
  Serial.println(String("Corrente = ") + corrente + " A");
  Serial.println(millis()-time);
  Serial.println("=============================================");
  delay(2000);
}
