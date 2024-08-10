const express = require('express');
const bcrypt = require('bcrypt');
const session = require('express-session');
const mysql = require('mysql');

const app = express();
const port = 3000;

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'puntos_estilo'
});

db.connect((err) => {
    if (err) throw err;
    console.log('Database connected!');
});

app.use(express.urlencoded({ extended: true }));
app.use(session({
    secret: 'secret',
    resave: false,
    saveUninitialized: true
}));

app.set('view engine', 'ejs');

app.get('/', (req, res) => {
    res.render('index');
});

app.get('/profile', (req, res) => {
    if (!req.session.user) {
        return res.redirect('/');
    }

    db.query('SELECT * FROM users WHERE id = ?', [req.session.user.id], (err, results) => {
        if (err) throw err;

        db.query('SELECT * FROM points WHERE user_id = ?', [req.session.user.id], (err, points) => {
            if (err) throw err;

            db.query('SELECT * FROM redemptions WHERE user_id = ?', [req.session.user.id], (err, redemptions) => {
                if (err) throw err;

                res.render('profile', { user: results[0], points, redemptions });
            });
        });
    });
});

app.post('/register', (req, res) => {
    const { username, password, otp, habeas_data, nombre, apellidos, identificacion, cargo, foto_perfil } = req.body;
    const hashedPassword = bcrypt.hashSync(password, 10);

    db.query('INSERT INTO users (username, password, otp, habeas_data, nombre, apellidos, identificacion, cargo, foto_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)', [username, hashedPassword, otp === 'on', habeas_data === 'on', nombre, apellidos, identificacion, cargo, foto_perfil], (err, result) => {
        if (err) throw err;
        res.redirect('/');
    });
});

app.post('/login', (req, res) => {
    const { username, password } = req.body;

    db.query('SELECT * FROM users WHERE username = ?', [username], (err, results) => {
        if (err) throw err;

        if (results.length > 0 && bcrypt.compareSync(password, results[0].password)) {
            req.session.user = results[0];
            res.redirect('/profile');
        } else {
            res.send('Username or password incorrect');
        }
    });
});

app.listen(port, () => {
    console.log(`Server running on port ${port}`);
});
