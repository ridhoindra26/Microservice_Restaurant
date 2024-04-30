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
def get_Menu():
    response = requests.get(f'http://localhost:5001/menu')
    return response.json()


def get_user(user_id):
    response = requests.get(f'http://localhost:5002/users/{user_id}')
    return response.json()

def get_reviewbyID(user_id):
    response = requests.get(f'http://localhost:5050/review/user/{user_id}')
    return response.json()

def get_menuFavorite(user_id):
    response = requests.get(f'http://localhost:5004/favorite/{user_id}')
    return response.json()

@app.route('/restaurant/<int:restaurant_id>')
def get_restaurantInfo(restaurant_id):

    restaurant_info = get_restaurant(restaurant_id)

    restaurant_review = get_RestaurantReviews(restaurant_id)

    restaurant_menu = get_RestaurantMenu(restaurant_id)

    return render_template('index.html', info=restaurant_info, review=restaurant_review, menu=restaurant_menu)

@app.route('/user/<int:user_id>')
def get_userInfo(user_id):

    user_info = get_user(user_id)

    user_review = get_reviewbyID(user_id)
    restaurant_menu = get_Menu()
    user_menu = get_menuFavorite(user_id)
    
    y=[]
    for i in user_menu:
        y.append(i['id_menu'])
    data = [x for x in restaurant_menu if x['menu_id'] in y]

    return render_template('user.html', info=user_info, review=user_review, menu=data)


if __name__ == "__main__":
    app.run(debug=True, port=5005)