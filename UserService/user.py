from flask import Flask, jsonify

app = Flask(__name__)

users = [
    {
        "user_id": 1,
        "username": "zarafifa",
        "email": "zahraafifa2014@gmail.com",
        "location": "Bandung, Indonesia",
    },
    {
       "user_id": 2,
        "username": "nicholasputra",
        "email": "nicholassaputra@gmail.com",
        "location": "Bandung, Indonesia",
    }
]

@app.route('/users')
def get_users():
    return jsonify(users)

@app.route('/users/<int:user_id>')
def get_userbyID(user_id):
    data = [x for x in users if x['user_id'] == user_id]
    return jsonify(data)

if __name__ == '__main__':
    app.run(debug=True, port=5002)