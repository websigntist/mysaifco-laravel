<form id="contactForm">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject" required><br><br>

    <label for="file">File:</label>
    <input type="file" id="document" name="document"><br><br>

    <label for="phone">Phone:</label>
    <textarea name="message" id="message" required></textarea><br><br>

    <input type="submit" value="Submit">
</form>

<div id="statusMessage"></div>

<script>
const API_URL = 'http://127.0.0.1:8000/api/v1/contact/submit';
const API_KEY = 'YxaBqHTcIjdW6nc3xjkNQkdZh0r0eEZnusqgDG2B';

document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const statusDiv = document.getElementById('statusMessage');
    statusDiv.innerHTML = '<p style="color: blue;">Sending...</p>';

    const formData = {
        first_name: document.getElementById('first_name').value,
        last_name: document.getElementById('last_name').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        subject: document.getElementById('subject').value,
        message: document.getElementById('message').value
    };

    try {
        const response = await fetch(API_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-API-KEY': API_KEY
            },
            body: JSON.stringify(formData)
        });

        const result = await response.json();

        if (response.ok && result.success) {
            statusDiv.innerHTML = '<p style="color: green;">✅ ' + result.message + '</p>';
            this.reset();
        } else {
            statusDiv.innerHTML = '<p style="color: red;">❌ ' + (result.message || 'Error sending message') + '</p>';
        }

    } catch (error) {
        statusDiv.innerHTML = '<p style="color: red;">❌ Network error. Please try again.</p>';
    }
});
</script>
