# 🧪 Gestore Magazzino – Web App per Laboratorio di Chimica

Applicazione web sviluppata su commissione per la gestione dell’inventario di un laboratorio di chimica.

Il sistema permette di monitorare materiali e oggetti presenti in laboratorio in modo semplice, rapido e ordinato, evitando errori di conteggio e mantenendo il database coerente.

Include:

- ➕ Inserimento nuovi oggetti  
- 🔼 Incremento quantità  
- 🔽 Decremento quantità (con blocco sotto zero)  
- 🗑️ Eliminazione oggetti  
- 🔄 Riordino automatico degli ID  
- 📱 Interfaccia responsive  

---

## 🎯 Obiettivo del Progetto

L’applicazione è stata realizzata per:

- Tenere traccia dei materiali disponibili  
- Semplificare la gestione delle quantità  
- Ridurre errori manuali  
- Garantire un database sempre ordinato  

---

## ⚙️ Installazione (Ambiente Locale con XAMPP)

### 1️⃣ Installare XAMPP

Scaricare XAMPP dal sito ufficiale:  
[https://www.apachefriends.org](https://www.apachefriends.org)

Avviare:

- **Apache**
- **MySQL**

---

### 2️⃣ Copiare il progetto

Inserire la cartella del progetto dentro:

```
C:\xampp\htdocs\
```

### 3️⃣ Creare il Database

1. Aprire phpMyAdmin  

[http://localhost/phpmyadmin](http://localhost/phpmyadmin)

2. Creare un nuovo database (esempio: `LabChimica`)
3. Importare il file:

```
magazzino.sql
```
⚠️ Nel file `config.php` il database configurato è:


$conn = new mysqli('localhost', 'root', '', 'Magazzino');

Se utilizzi un nome diverso per il database, modificare il parametro nel file config.php.

### 4️⃣ Avviare l'applicazione

Aprire nel browser:

[http://localhost/index.php](http://localhost/index.php)
## 🧠 Funzionamento

### ➕ Inserimento Oggetti
Permette di aggiungere un nuovo oggetto con quantità iniziale pari a 1.

### 🔼🔽 Gestione Quantità
- `+` incrementa la quantità  
- `-` decrementa la quantità  
- La quantità non può scendere sotto zero (uso di `GREATEST()` in SQL)

### 🗑️ Eliminazione
Rimuove definitivamente l’oggetto dal database.

### 🔄 Adjust ID
Riordina gli ID in modo progressivo e aggiorna l’`AUTO_INCREMENT` della tabella.

---

## 🔐 Sicurezza Implementata

- Prepared Statements (protezione SQL Injection)  
- Sanitizzazione output con `htmlspecialchars()`  
- Controllo valori numerici  
- Blocco decremento sotto zero  

---

## 🛠️ Tecnologie utilizzate

- **PHP (MySQLi)**
- **MySQL**
- **HTML5 / CSS3**
- **XAMPP (Apache + MySQL)**
