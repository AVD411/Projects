const express = require('express');
const cors = require('cors');
const mysql = require('mysql2');
const app = express();
app.use(cors());
app.use(express.json());

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'groceryshop'
});

// Registration
app.post('/register', (req, res) => {
  const { name, email, password } = req.body;
  db.query('INSERT INTO users (name, email, password) VALUES (?, ?, ?)',
    [name, email, password],
    (err, result) => {
      if (err) return res.status(500).send(err);
      res.send({ message: "User registered successfully" });
    }
  );
});

// Login
app.post('/login', (req, res) => {
  const { email, password } = req.body;
  db.query('SELECT * FROM users WHERE email = ? AND password = ?', [email, password],
    (err, result) => {
      if (err) return res.status(500).send(err);
      if (result.length > 0) res.send({ message: "Login Successful" });
      else res.status(401).send({ message: "Invalid credentials" });
    }
  );
});

// Get Catalogue
app.get('/catalogue', (req, res) => {
  db.query('SELECT * FROM products', (err, result) => {
    if (err) return res.status(500).send(err);
    res.send(result);
  });
});

app.listen(5000, () => console.log('Server running on port 5000'));
