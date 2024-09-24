
# GLPI Satisfação - Plugin de Pesquisa de Satisfação

Este plugin para o **GLPI** permite que os usuários respondam à pesquisa de satisfação diretamente a partir de um e-mail, sem a necessidade de fazer login no sistema. Simplifica a coleta de feedback e melhora a experiência do usuário.

## Funcionalidades

- Envio de pesquisas de satisfação automáticas via e-mail.
- Respostas podem ser enviadas com um único clique, diretamente no corpo do e-mail.
- Não é necessário que o destinatário esteja logado no GLPI para responder à pesquisa.

## Requisitos

- GLPI versão 10.0 ou superior.

## Instalação

1. Faça o download ou clone o repositório do plugin no seu servidor GLPI:
   ```bash
   git clone https://github.com/seu-usuario/satisfacao-glpi.git
   ```

2. Mova a pasta do plugin para o diretório de plugins do GLPI:
   ```bash
   mv satisfacao-glpi /seu-caminho/glpi/plugins/
   ```

3. No painel administrativo do GLPI, vá até **Configurar > Plugins** e ative o plugin de satisfação.

## Configuração

Após ativar o plugin, configure a pesquisa de satisfação da seguinte forma:

1. No e-mail de pesquisa de satisfação, utilize a variável:
   ```
   ##ticket.satisfacao##
   ```

2. Ao enviar o e-mail, o usuário receberá as seguintes imagens com links para responder diretamente à pesquisa:

   ![image](https://github.com/user-attachments/assets/69e4ac8c-6b97-48c2-a27a-f88e81ffcc56)

   As imagens representarão as opções de resposta (satisfação, insatisfação, etc.) com links personalizados para o envio da resposta.

## Como Funciona

1. Quando um ticket for resolvido ou fechado, o GLPI enviará automaticamente um e-mail de pesquisa de satisfação ao solicitante.
2. O e-mail conterá um conjunto de imagens com links para que o usuário possa escolher seu nível de satisfação com apenas um clique.
3. Após a escolha, a resposta será registrada diretamente no GLPI, sem a necessidade de login.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir um **pull request** ou relatar um problema na [página de issues](https://github.com/isaque-silva/satisfacao/issues).
