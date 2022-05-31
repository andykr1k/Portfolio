const express = require('express');
const app = express();
const mongoose = require('mongoose');
const bodyParser = require('body-parser');

app.use(bodyParser.urlencoded({ extended: true }));

mongoose.connect('mongodb+srv://root:adminpass@portfoliocluster.nwjaqh0.mongodb.net/?retryWrites=true&w=majority', { useNewUrlParser: true}, { useUnifiedTopology: true });

const dataSchema = {
    name: String,
    email: String,
    subject: String,
    message: String
}

const message = mongoose.model("Message", dataSchema);

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
    res.sendFile(__dirname + '/styles/index.css');
})

app.post('/', (req, res) => {
    let newMessage = new message({
        name: req.body.name,
        email: req.body.email,
        subject: req.body.subject,
        message: req.body.message
    })
    newMessage.save();
    res.redirect('/');
})

app.listen(3000, () => {
    console.log('Server started on port 3000');
})
