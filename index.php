<?php

include_once('./includes/header.php');
?>

<section class="container pg-inicio">
    <br>
    <div class="row">
        <div class="col-md-6">
            <br><br>
            <img style="width: 26rem;" class="card-img-top" src="img/pc.jpeg" alt="Card image cap">
        </div>
        <div class="col-md-6">
            <h4>Problemática</h4>
            <br>
            <p>
                Um dos principais problemas enfrentado hoje pelo brasileiro é a energia. Segundo Roberto
                D’Araújo (2018), o Brasil hoje ocupa o quinto lugar dos países com o megawatt/h (MW/h)
                mais caros do mundo. A tarifa teve, em 17 anos, um acréscimo de 499% na tarifa residencial
                e 823% na tarifa do setor industrial.
                <br>
                Ao lado o supercomputador brasileiro Santos Dumont que consume, segundo
                o R7, R$ 500 mil em energia. Por esse motivo o mesmo já teve o seu
                funcionamento interrompido algumas vezes e consequentemente atrasando muitas pesquisas.
            </p>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-6">
            <h4>Objetivo</h4>
            <br>
            <p>
                Este trabalho tem como objetivo desenvolver um equipamento capaz
                de medir os gastos gerados por um eletrodoméstico em uma residência.
            </p>
            <h4>A importância</h4>
            <br>
            <p>
                Com o aumento constante da fatura de energia, torna-se viável 
                ter o controle dos gastos de energia das residências. Saber qual
                equipamento eletrônico possui o maior gasto da a possibilidade
                para o cliente rever maneiras de economizar.
            </p>
        </div>

        <div class="col-md-6">
            <br>
            <img style="width: 26rem;" class="card-img-top" src="img/conta.JPG" alt="Card image cap">
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-6">
            <img style="width: 28rem;" class="card-img-top" src="img/bigpicture.jpeg" alt="Card image cap">
        </div>
        <div class="col-md-6">
            <br><br>
            <h4>Funcionamento do Compact Box</h4>
            <br>
            <p>
                O dispositivo funcionará da seguinte maneira: 
                O usuário conectará o dispositivo a uma tomada o Compact Box, onde 
                o mesmo irá coletar dados da corrente e enviá-la para o banco de 
                dados onde esses dados serão apresentados em uma aplicação web.
                <br>
                Ao lado a máquina de Estado do Dispositivo.
            </p>
        </div>
    </div>
    <br><br><br>
    <div class="row">
        <div class="col-md-6">
            <img style="width: 28rem;" class="card-img-top" src="img/maq.png" alt="Card image cap">
        </div>
        <div class="col-md-6">
            <br>
            <p>
                Ao lado a máquina de estado do Compact Box.
                <br>
                No estado desligado o dispositivo fica consultando o banco de dados
                para saber qual valor da variável status. Quando status é igual a
                1 o dispositivo muda para o estado ligado, onde execulta as funções
                de envio e coleta de dados. Nesse estado o dispositivo também consulta
                o banco, caso o valor da variável for 0 ele irá transitar para o estado
                desligado.
            </p>
        </div>
    </div>
    <br><br><br>
    <div class="row">
        <div class="col-md-6">
            <br><br><br><br>
            <h4>Aplicação Web</h4>
            <br>
            <p>
                Na aplicação web o usuário poderá se registrar e posteriormente
                vincular os dispositivos ao seu usuário. Com isso, poderá criar
                configurações de diferentes modos para as diversas situações e
                eletrônicos da sua residência. Ainda, poderá monitorar o 
                consumo médio de seus eletrônicos através de um gráfico.

            </p>
        </div>
        <div class="col-md-6">
            <img style="width: 25rem;" class="card-img-top" src="img/storyboard.png" alt="Card image cap">


        </div>
    </div>
    <br><br>
    <div class="row">

        <div class="col-md-6">
            <br><br>
            <img style="width: 26rem;" class="card-img-top" src="img/circuito.jpg" alt="Card image cap">
        </div>
        <div class="col-md-6">

            <h4>Materiais Usados</h4>
            <br>
            <ul class="list-group">
                <li class="list-group-item">Arduino Uno</li>
                <li class="list-group-item">Sensor de Corrente Invasivo ACS712 30A</li>
                <li class="list-group-item">Módulo Relé</li>
                <li class="list-group-item">Módulo Wifi ESP8266-1</li>
                <li class="list-group-item">Protoboard e Cabos</li>
            </ul>
            <br>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <br><br><br><br><br>
            <h4>Armazenamento de Dados</h4>
            <br>
            <p>
                Os dados referentes aos usuários e as configurações dos dispositivos
                serão armazenados em banco de dados no Google Cloud. Já para os dispositivos
                será usado um sistema de log. Tal método foi adotado, pois se tornaria inviável
                armazenar os dados a cada 5s. Em um dia que dispositivo permanecesse ligado,
                seria gerado mais de 17000 linhas de log.


            </p>
            <br>
        </div>

        <div class="col-md-6">
            <br><br>
            <img style="width: 26rem;" class="card-img-top" src="img/der.png" alt="Card image cap">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <br><br>
            <img style="width: 26rem;" class="card-img-top" src="img/esp.jpg" alt="Card image cap">
        </div>
        <div class="col-md-6">
            <br><br><br>
            <h4>ESP8266-1</h4>
            <br>
            <p>
                Dentre os inúmeros módulos que surgiram recentemente para explorar
                a onda da Internet das Coisas (IoT), o que mais se destaca é o ESP8266.
                O que a princípio chama muito atenção neste módulo são dois aspectos.
                O primeiro, é seu tamanho muito reduzido. E o segundo, é seu 
                preço, na faixa dos $ 5,00. Os módulos ESP8266 são fornecidos 
                numa ampla variedade de modelos, com diferenças perceptíveis 
                principalmente no que tange à quantidade de IOs disponíveis 
                para acesso externo, e  no tamanho do módulo.
            </p>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <br><br><br><br><br>
            <h4>Sensor de Corrente Invasivo ACS712 30A</h4>
            <br>
            <p>
                O ACS712 fabricado pela Allegro, um transdutor de corrente 
                baseado no Efeito Hall. Geralmente é utilizado para medição 
                de corrente DC, mas também pode ser utilizado para medição 
                em AC o que o torna muito versátil.
                <br><br>
                Principais benefícios em se utilizar o ACS712:
            </p>
            <ul>
                <li>
                    Segurança: Esse componente garante isolamento galvânico entre
                    o circuito que será medido e a sua saída analógica (desde que
                    sejam tomados os devidos cuidados no projeto).
                </li>
                <li>
                    Simplicidade: O componente em si depende de poucos componentes
                    adicionais para sua utilização, no nosso caso, não dependemos
                    de nenhum componente já que o módulo possui toda a circuitaria
                    necessária.
                </li>
                <li>Versatilidade: Por poder ser utilizado tanto em DC como em AC
                    torna-se muito versátil na sua maleta de sensores/transdutores.
                </li>
            </ul>
            <br>
        </div>

        <div class="col-md-6">
            <br><br><br><br><br><br><br>
            <img style="width: 26rem;" class="card-img-top" src="img/acs.jpg" alt="Card image cap">
        </div>
    </div>
        <div class="row">
            <div class="col-md-6">
                <br>
                <img style="width: 26rem;" class="card-img-top" src="img/http.jpg" alt="Card image cap">
            </div>
            <div class="col-md-6">
                <br><br><br>
                <h4>Protocolo HTTP 1.0</h4>
                <br>
                <p>
                    O protocolo HTTP (HyperText Transfer Protocol) é o protocolo
                    mais utilizado para transferir dados na Internet (em especial 
                    páginas Web escritas em HTML). A versão 1.0 do protocolo 
                    (a mais utilizada) permite, então, transferir mensagens com 
                    cabeçalhos que descrevem o conteúdo da mensagem utilizando 
                    uma codificação de tipo MIMO.
                </p>
                <br>
            </div>
        </div>
    <br><br><br>
        <div class="row">
            <div class="col-md-6">
                <h4>Certificado SSL <a href="https://www.ssllabs.com/ssltest/analyze.html?d=compactbox.tk"><i class="fas fa-external-link-square-alt"></i></a></h4>
                <br>
                <p>
                    O SSL (Secure Sockets Layer) é um protocolo de segurança criado
                    pela Netscape. Quando o  navegador se conecta a um 
                    servidor SSL, ele automaticamente pedirá ao servidor um 
                    certificado digital da Autoridade Certificadora (CA). 
                    Ela autentica a identidade do servidor para garantir 
                    que você não enviará dados sigilosos para um hacker ou um site falso.
                </p>
                <br>
            </div>
    
            <div class="col-md-6">
                <br><br>
                <img style="width: 26rem;" class="card-img-top" src="img/ssl.png" alt="Card image cap">
            </div>
        </div>

    <div class="row">
        <div class="col-md-6">
            <br><br><br><br>
            <img style="width: 26rem;" class="card-img-top" src="img/custos.jpg" alt="Card image cap">
        </div>
        <div class="col-md-6">
            <br>
            <h4>Custos</h4>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Equipamento</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Arduino Uno</td>
                        <td>R$ 39,59</td>
                    </tr>
                    <tr>
                        <td>Módulo ESP8266-01</td>
                        <td>R$ 21,90</td>
                    </tr>
                    <tr>
                        <td>Sensor ACS712 30A</td>
                        <td>R$ 19,90</td>
                    </tr>
                    <tr>
                        <td>Módulo Relé</td>
                        <td>R$ 7,90</td>
                    </tr>
                    <tr>
                        <td>Protoboard e Jumpers</td>
                        <td>R$ 24,65</td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td><b>R$ 113,94</b></td>
                    </tr>
                </tbody>
            </table>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <br><br>
            <h4>Observações Importantes</h4>
            <br>
            <ul>
                <li>
                    Quanto de energia o Compact Box consome?
                    <br><br>
                    Resposta: Neste caso a quantidade de energia gasto pelo Compact
                    Box é desprezivel, sendo possível controlá-la apenas usando uma
                    margem de erro.
                </li>
                <li>
                    E quanto aos testes de software?
                    <br><br>
                    Resposta: Durante o projeto não foi realizado nenhum teste, foi percebido
                    que os testes deveriam ser feitos antes mesmo da realização de 
                    um commit.
                    <br>
                    Mas nesse sentido foi realizado um estudo para de quais testes
                    deveriam ser feitos, nesse são:
                    <br><br>
                    <ul>
                        <li>
                            Funcionabilidade:
                            <br>
                            Testar o comportamento lógico
                            <br><br>
                        </li>
                        <li>
                            Interfaces:
                            <br>
                            Testar se o site roda em todos os browser.
                            <br>
                            Testar com outros micro-controladores.
                            <br><br>
                        </li>
                        <li>
                            Regressão:
                            <br>
                            Testar se modificações no sistema não introduziriam falha.
                            <br><br>
                        </li>
                        <li>
                            Segurança:
                            <br>
                            Robustez contra falhas - referentes aos protocolos, 
                            os arquivos estarem no servidor do google e tal 
                            (no site se a possibilidade de sql inject).
                            <br><br>
                        </li>
                        <li>
                            Carga e stress:
                            <br>
                            Os limites do sistema (envio de dados a cada 5 
                            segundos, limite de amperagem, limite de tempo de 
                            requisição de conexão).
                            <br><br>
                        </li>
                    </ul>
                </li>
                
            </ul>
            <br>
        </div>

        <div class="col-md-6">
            <br><br><br><br>
            <img style="width: 26rem;" class="card-img-top" src="img/ob.jpg" alt="Card image cap">
            <br><br><br><br>
            <img style="width: 26rem;" class="card-img-top" src="img/ob2.png" alt="Card image cap">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <br><br>
            <img style="width: 26rem;" class="card-img-top" src="img/ap.jpg" alt="Card image cap">
        </div>
        <div class="col-md-6">
            <br><br><br><br>
            <h4>Trabalhos Futuros</h4>
            <p>
                Este trabalho possui um objetivo secundário que é prever o quanto
                um determinado dispositivo poderá gastar em um intervalo determinado
                de tempo. Ainda se fará o aprimoramento da aplicação web realizando
                os teste de softwares necessário.
            </p>
            <br>
        </div>

        
    </div>
    <br>
</section>

<?php

include_once('./includes/footer.php');
