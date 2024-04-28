from flask import Flask, jsonify

app = Flask(__name__)

users = [
    {
        "user_id": 1,
        "username": "zarafifa",
        "email": "zahraafifa2014@gmail.com",
        "location": "Bandung, Indonesia",
        "reviews": [
            {
                "restaurant_name": "Pizza Palace",
                "restaurant_id" : 1,
                "review": "Bersih, makannnya juga enak!"
            },
            {
                "restaurant_name": "Solaria",
                "restaurant_id" : 2,
                "review": "Tempatnya agak sempit dan pengap"
            }
        ]
    },
    {
       "user_id": 2,
        "username": "nicholasputra",
        "email": "nicholassaputra@gmail.com",
        "location": "Bandung, Indonesia",
        "reviews": [
            {
                "restaurant_name": "Mixue",
                "restaurant_id" : 3,
                "review": "Dari luar, tempatnya sangat estetik"
            },
            {
                "restaurant_name": "Solaria",
                "restaurant_id" : 2,
                "review": "Agak kecil tempatnya, tapi makannya murah dan lumayan enak"
            }
        ]
    }
]

@app.route('/users')
def get_users():
    return jsonify(users)

if __name__ == '__main__':
    app.run(debug=True, port=5002)