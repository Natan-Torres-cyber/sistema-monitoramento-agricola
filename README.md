# AgroMonitor: Sistema de Monitoramento Agrícola

Sistema web para um produtor rural controlar **insumos**, **lotes de plantio** e as **aplicações** de insumos em cada lote, com baixa automática de estoque.

Projeto em grupo do curso de Análise e Desenvolvimento de Sistemas (FEMA), desenvolvido para um produtor rural.
**Minha parte:** modelagem do banco de dados MySQL e participação na implementação do CRUD.

## Funcionalidades

- Login com senha criptografada (`password_hash` / `password_verify`) e páginas protegidas por sessão
- CRUD de usuários, insumos, lotes e aplicações
- Ao registrar uma aplicação, o sistema impede usar mais insumo do que há em estoque e desconta a quantidade aplicada

## Banco de dados

4 tabelas ligadas por chaves estrangeiras:

| Tabela | Conteúdo |
|---|---|
| `usuario` | nome, e-mail, senha (hash), perfil |
| `insumo` | nome, tipo, unidade de medida, quantidade em estoque |
| `lote` | nome, cultura, área em hectares, localização |
| `aplicacao` | data, quantidade utilizada, observação → insumo, lote, usuário |

As consultas usam **PDO com consultas parametrizadas**, o que evita SQL injection.

## Tecnologias

PHP 8 · MySQL/MariaDB · PDO · HTML/CSS · Materialize CSS

## Arquitetura

```
MODEL/   # classes das entidades
DAL/     # acesso ao banco (uma classe por tabela)
VIEW/    # telas e operações de cada entidade
SQL/     # script de criação do banco
```

## Como executar

1. Instale o XAMPP (ou outro ambiente com PHP 8 e MySQL).
2. Copie a pasta do projeto para `htdocs/`.
3. No phpMyAdmin, importe `SQL/curricularizacao.sql`.
4. Acesse `http://localhost/sistema-monitoramento-agricola/login.php`.
5. Login de teste: `admin@agromonitor.com` / `admin123`.

## Autor

Natan Torres · [LinkedIn](https://www.linkedin.com/in/natan-torres-248367364)
