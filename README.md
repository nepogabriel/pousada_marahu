# Documentação Back-End

## Login
    http://127.0.0.1:8000/api/login
- Tipo: **POST**

### Listar o atual usuário logado:
    http://127.0.0.1:8000/api/me
- Tipo: **POST**

## Logout
    http://127.0.0.1:8000/api/logout
- Tipo: **POST**

---

## USUÁRIO
### Criar usuário:
    http://127.0.0.1:8000/api/user/create
- Tipo: **POST**


- Exemplo *JSON*:
``` json
{
    "name": "Miraldo Cordeiro",
    "email": "miraldo@email.com",
    "password": "123456",
    "cpf": "07514809230",
    "phone": "61999999999"
}
```

### Listar todos os usuários:
    http://127.0.0.1:8000/api/users
- Tipo: **GET**

---

## ACOMODAÇÃO
### Criar acomodação:
    http://127.0.0.1:8000/api/accommodation/create

- Exemplo *JSON*:
``` json
{
    "name": "Suíte Família",
    "value": 300.34,
    "double_bed": 0,
    "single_bed": 1,
    "air_conditioning": 0,
    "tv": 3
}
```

### Listar acomodações:
    http://127.0.0.1:8000/api/accommodations

### Listar acomodação especifica:
    http://127.0.0.1:8000/api/accommodation/info/9(id da acomodação)

### Atualizar acomodação:
    http://127.0.0.1:8000/api/accommodation/update/9(id da acomodação)

- Exemplo *JSON*:
``` json
{
    "name": "Quarto Gabriel",
    "value": 300.34,
    "double_bed": 0,
    "single_bed": 1,
    "air_conditioning": 0,
    "tv": 3
}
```

✍ OBS.: Enviar somente o campo que for alterar.

### Deletar acomodação:
    http://127.0.0.1:8000/api/accommodation/10(id da acomodação)

---

## ACOMPANHANTES
### Criar acompanhante:
    http://127.0.0.1:8000/api/escort/create/5(id do usuário)

- Exemplo *JSON*:
``` json
{
    "name": "Veronica Santos",
    "email": "veronica@email.com",
    "cpf": "12345678912",
    "phone": "61999999999"
}
```

### Listar acompanhantes:
    http://127.0.0.1:8000/api/escorts/5(id do usuário)

### Listar acompanhante específico:
    http://127.0.0.1:8000/api/escort/5(id do usuário)/1(id do acompanhante)

### Atualizar acompanhante:
    http://127.0.0.1:8000/api/escort/update/5(id do usuário)/2(id do acompanhante)

- Exemplo *JSON*:
``` json
{
    "name": "Mônica dos Santos",
    "phone": "63999998888"
}
```

✍ OBS.: Enviar somente o campo que for alterar.

### Deletar Acompanhante:
    http://127.0.0.1:8000/api/escort/delete/{id_user}/{id_escort}

---

# Reserva:

###Calcular valor da reserva:
- Tipo: **POST**
- Endpoint:
```
- api/reservation/calculate
```
- Exemplo *JSON*:
``` json
{
    "checkIn": "2022-07-30", - String (yyyy-mm-dd)
    "checkOut": "2022-08-20", - String (yyyy-mm-dd)
    "hotelRate": 3, Int
    "adults": 3, - Int
    "children": [ 
        {
            "childAge": 2 - Int
        },
        {
            "childAge": 7 - Int
        },
        {
            "childAge": 13 - Int
        }
    ],
    "pets": 2 - Int
}
```

---

# Doc. Laravel

-Criar o Controller:
php artisan make:controller NomeController

-Status da migration:
php artisan migrate:status

-Criar tabelas bases do lavavel:
php artisan migrate

-Criar tabela especifica laravel:
php atisan make:migration create_products_table

-Adicionando coluna na tabela
php artisan make:migration add_category_to_products_table

-Deleta e migra todas as tabelas novamente:
php artisan migrate:fresh

-Rollback migrate:
php artisan migrate:rollback

-Refresh migrate (faz o rollback e o migrate em um comando):
php artisan migrate:refresh

-Criando model:
php artisan make:model Event

-Gerando key p/ clone projeto laravel:
php artisan key:generate
