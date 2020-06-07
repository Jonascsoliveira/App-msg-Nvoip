# App-msg-Nvoip

App feito com ingração a API da Nvoip para envio de SMS e Voice SMS.

# Atenção!

Para funcionamento correto das funções de envio de mensagem é necessário que haja um certificado válido em seu servidor, seja ele localhost ou remoto. A [API da Nvoip](https://nvoip.docs.apiary.io/) requer conexão segura por meio de [SSL](https://www.hostinger.com.br/tutoriais/o-que-e-ssl-tls-https/), se estes requisitos forem cumpridos será possível enviar mensagens pela API da Nvoip.

## Objetivo

O objetivo do projeto é poder cadastrar clientes e poder lista-los, filtrar por CPF, email ou telefone para que possa haver o envio de mensagens de voz ou sms para o mesmo, fazendo uso da API Nvoip. Sempre que é feito uma ação, a mesma é salva em uma tabela de logs para registrar o evento.