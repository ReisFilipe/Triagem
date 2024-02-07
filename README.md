
# Controle de Triagem HNSG

Sistema feito com intuito de substiturir uma planilha e facilitar o acesso para o controle da triagem para os colaboradores do HNSG.




![Logo](https://hnsg.com.br/wp-content/uploads/2021/05/logo_hospital-e1621366447931.png)


## Autores

- [@ReisFilipe](https://github.com/reisfilipe)


## 🚀 Sobre mim
Eu sou uma pessoa desenvolvedora full-stack apaixonado por tecnologias e em busca de melhorias de processos e rotinas para os usuarios.


## Instalação

Baixe o projeto do GitHub

```bash
  git clone https://github.com/ReisFilipe/Controle-Triagem-HNSG.git
  cd Triagem

  cp .env.example .env
  php artisan key:generate

  composer install --optimize-autoload --no-dev
  php artisan config:cache
  php artisan route:cache

  php artisan migration
  php artisan db:seed
  
```
    