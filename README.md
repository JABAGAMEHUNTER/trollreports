## Sobre este sistema
- Sistema Laravel 10 com php8
- Banco de dados Mariadb
- Para ser usado e integrado com frontend React

## Breve descrição do sistema
- Sistema de report para múltiplos jogos, onde um
  usuário pode logar e registrar usuários que
  costumam trollar partidas in-game.
  Podendo ser consultado para saber se um
  usuário é um troll recorrente ou não.

## Objetivo Geral
- Criar sistema de report para múltiplos jogos
  focado em identificar trolls

## Objetivo específico
- Criar cadastro para usuários simples e rápido
- Disponibilizar consulta de perfís de usuários de múltiplos jogos
- Criar sistema de score para cada troll
## Opcional
- Recompensar os usuarios que reportaram os trolls
  caso estes sejam penalizados in-game

## Rotas
- Para acessar as rotas não precisa usar o prefix 'api' antes
  em vez de "/api/register"   usar => "/register"

get    / -> Retorna json com "success" -> true
get    /users -> Retorna index com collection de users
post   /users -> cadastra um user que estiver dentro da request
