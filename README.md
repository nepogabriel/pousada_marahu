# Documentação

## USUÁRIO
### Listar todos os usuários:
    http://127.0.0.1:8000/api/users

### Criar usuário:
    http://127.0.0.1:8000/api/users/create

- Exemplo Json:
``` json
{
    "name": "miraldo",
    "email": "miraldo@email.com",
    "password": "123",
    "cpf": "07511969160",
    "phone": "61995282320"
}
```

---

## ACOMODAÇÃO
### Criar acomodação:
    http://127.0.0.1:8000/api/accommodation/create

- Exemplo Json:
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

### Listar acomodações:
    http://127.0.0.1:8000/api/accommodations

### Listar acomodação especifica:
    http://127.0.0.1:8000/api/accommodation/info/9(id da acomodação)

### Atualizar acomodação:
    http://127.0.0.1:8000/api/accommodation/update/9(id da acomodação)

- Exemplo Json:
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

OBS.: Enviar somente o campo que for alterar.

### Deletar acomodação:
    http://127.0.0.1:8000/api/accommodation/10(id da acomodação)

---

## ACOMPANHANTES
### Criar acompanhante:
    http://127.0.0.1:8000/api/escort/create/5(id do usuário)

### Listar acompanhantes:
    http://127.0.0.1:8000/api/escorts/5(id do usuário)

### Listar acompanhante específico:
    http://127.0.0.1:8000/api/escort/5(id do usuário)/1(id do acompanhante)

