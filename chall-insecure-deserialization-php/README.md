<img src="https://blog.crowsec.com.br/content/images/size/w2000/2023/04/Copy-of-POP-Chains-Gadget.jpg">

# Laboratório de desserialização insegura em PHP
Laboratório desenvolvido para o [blog da crowsec](https://blog.crowsec.com.br/).

# Instruções para iniciar o laboratório
Faça o clone desse repositório executando:
```
git clone https://github.com/crowsec-edtech/blog
```

Entre no diretório do laboratório:
```
cd blog/chall-insecure-deserialization-php
```

Execute o docker-compose:
```
sudo docker-compose up --build
```

Executando os comandos acima, o laboratório será iniciado e você pode acessá-lo na porta 80.

# Atenção
#### Caso você não tenha docker instalado:

### Debian
```
sudo apt install docker.io docker-compose -y
```
### Arch
```
sudo pacman -Syu docker docker-compose
```
<br/>

> Copyright (c) 2023 Crowsec EdTech
