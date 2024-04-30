from flask import Flask, jsonify, render_template
import requests

app = Flask(__name__)

def get_restaurant(restaurant_id):
    response = requests.get(f'http://localhost:5000/restaurants/{restaurant_id}')
    return response.json()

def get_RestaurantReviews(restaurant_id):
    response = requests.get(f'http://localhost:5050/review/restaurant/{restaurant_id}')
    return response.json()

def get_RestaurantMenu(restaurant_id):
    response = requests.get(f'http://localhost:5001/menu/{restaurant_id}')
    return response.json()

@app.route('/restaurant/<int:restaurant_id>')
def get_restaurantInfo(restaurant_id):

    restaurant_info = get_restaurant(restaurant_id)

    restaurant_review = get_RestaurantReviews(restaurant_id)

    restaurant_menu = get_RestaurantMenu(restaurant_id)

    return render_template('index.html', info=restaurant_info, review=restaurant_review, menu=restaurant_menu)

if __name__ == "__main__":
    app.run(debug=True, port=5005)