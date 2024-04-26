const express = require("express");
const app = express();

const restaurants = [
  {
    id: 1,
    name: "Restaurant 1",
    category: "western",
    descritpion:
      "A hearty and satisfying blend of cowboy-inspired flavors, where smoky BBQ meets tangy sauces and crispy textures. From juicy burgers to sizzling steaks and zesty salads, it's a taste of the Wild West with a modern twist. Saddle up for a culinary adventure that's as comforting as it is delicious!",
  },
  {
    id: 2,
    name: "Restaurant 2",
    category: "indonesian",
    descritpion: "A tantalizing fusion of bold spices and rich flavors from Southeast Asia. From sizzling satay to aromatic rendang, it's a journey through Indonesia's diverse culinary landscape in every bite.",
  },
  { id: 3, name: "Restaurant 3", category: "mediterranean", descritpion: "Dive into the flavors of the Mediterranean with fresh ingredients, vibrant herbs, and zesty dishes like grilled kebabs and tangy tzatziki." },
];

app.listen(5000, () => {
  console.log("server berjalan");
});

// GET All Restaurants
app.get("/restaurants", (req, res) => {
  res.json(restaurants);
});

// GET Restaurant by Id
app.get("/restaurants/:restaurant_id", (req, res) => {
  const restaurantId = parseInt(req.params.restaurant_id);
  const restaurant = restaurants.find((restaurant) => restaurant.id === restaurantId);

  if (restaurant) {
    res.json(restaurant);
  } else {
    res.status(404).json({ error: "restaurant not found" });
  }
});
