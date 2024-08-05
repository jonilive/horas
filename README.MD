# HORAS
## Web App para gestão dos custos/hora de tarefas de operários
O objectivo principal desta aplicação e gerir valores pendentes a operários com base em tarefas realizadas, podendo definir um valor/hora e o numero de horas que este trabalhou.\
A app tem uma página exclusiva ao calculo do valor do operário referente ao mês que pretende saber.

## Antes de usar
Esta web app é bastante simples pelo que não deve ser confiada para ambientes de produção expostos na internet.\
A mesma não foi testada contra possiveis PHP injection. SQL injection ou XSS.

### Como instalar
Ter um servidor web com PHP 8, criar uma base de dados MySQL.\
No ficheiro **index.php** editar a secção *CONFIGURATION* de forma a que os **DB_HOST**, **DB_USER**, **DB_PASS** e **DB_NAME** coincidão com os dados de acesso á base de dados. Aproveite também para definir o **APP_LOGIN** e **APP_PASSWORD** que serão os dados de acesso á aplicação.\
Não tem de se preocupar com a criação de tabelas na base de dados, as mesmas serão criadas automáticamente.\
Sinta-se á vontade de alterar outras definições na secção *CONFIGURATION*.
