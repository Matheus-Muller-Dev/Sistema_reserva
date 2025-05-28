## 📁 Estrutura Inicial do Projeto

- [ ] Criar uma pasta para o projeto (ex: `controle_pousada`)
- [ ] Criar os diretórios:
  - [ ] `/includes` → conexões e funções comuns
  - [ ] `/reservas` → formulários e páginas de reservas
  - [ ] `/relatorios` → geração de relatórios
  - [ ] `/avisos` → scripts para envio de avisos
  - [ ] `/assets` → arquivos de CSS e JS
- [ ] Criar o banco de dados MySQL: `pousada`

---
## 🗂️ Criar Tabelas no Banco de Dados


```sql

CREATE TABLE chales (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(50) NOT NULL

);

  

CREATE TABLE clientes (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(100) NOT NULL,

    email VARCHAR(100),

    telefone VARCHAR(20)

);

  

CREATE TABLE reservas (

    id INT AUTO_INCREMENT PRIMARY KEY,

    cliente_id INT,

    chale_id INT,

    checkin DATE,

    checkout DATE,

    status ENUM('ativa', 'cancelada') DEFAULT 'ativa',

    FOREIGN KEY (cliente_id) REFERENCES clientes(id),

    FOREIGN KEY (chale_id) REFERENCES chales(id)

);
```

---
## 📅 Calendário de Disponibilidade por Chalé

  
- [ ] Criar página `/reservas/calendario.php`
- [ ] Exibir os 4 chalés com botões ou links
- [ ] Consultar as datas reservadas (`status = 'ativa'`)
- [ ] Exibir calendário com períodos ocupados
- [ ] Utilizar biblioteca como FullCalendar (opcional)

```sql
SELECT * FROM reservas WHERE chale_id = ? AND status = 'ativa'
```

---
## 📝 Formulário para Criar e Editar Reservas

  ### Criar Reserva

- [ ] Criar formulário em `reservar.php`
- [ ] Incluir campos: nome, telefone, e-mail, chalé, check-in, check-out
- [ ] Verificar disponibilidade da data
- [ ] Inserir cliente e reserva nas tabelas

```sql
SELECT * FROM reservas WHERE chale_id = ?

AND ((checkin <= ? AND checkout > ?) OR (checkin < ? AND checkout >= ?))
```

  ### Editar Reserva

- [ ] Criar página `editar_reserva.php?id=`
- [ ] Carregar dados da reserva
- [ ] Atualizar dados com `UPDATE`

---

  ## ⏰ Aviso Automático 7 Dias Antes do Check-in

- [ ] Criar script `avisos/verificar_checkins.php`
- [ ] Consultar reservas com check-in em 7 dias
- [ ] Enviar e-mail ou logar aviso
- [ ] Agendar `cron job` diário


```sql
SELECT r.*, c.email FROM reservas r

JOIN clientes c ON r.cliente_id = c.id

WHERE DATEDIFF(checkin, CURDATE()) = 7 AND r.status = 'ativa'
```

---
## 📊 Relatórios por Data, Cliente e Quarto

- [ ] Criar página `relatorios/index.php`
- [ ] Adicionar filtros: período, cliente, chalé
- [ ] Consultar dados com `SELECT`
- [ ] Exibir em tabela
- [ ] (Opcional) Exportar `.csv`

---
## 🔁 Alterar e Cancelar Reservas

### Alterar

- [ ] Reutilizar formulário de edição
- [ ] Permitir alterar dados
### Cancelar

- [ ] Criar botão "Cancelar"
- [ ] Atualizar `status` para `'cancelada'`

```sql
UPDATE reservas SET status = 'cancelada' WHERE id = ?
```

- [ ] Filtrar apenas reservas ativas em calendários e relatórios

---
## ✅ Extras

- [ ] Utilizar `mysqli` ou `PDO` com prepared statements
- [ ] Validar datas no formulário (`checkout > checkin`)
- [ ] Implementar login simples para uso interno (opcional)
- [ ] Criar backups regulares do banco de dados