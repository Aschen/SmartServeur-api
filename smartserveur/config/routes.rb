Rails.application.routes.draw do
  resources :tables

  resources :sessions

  resources :orders

  resources :products

  resources :categories

  # Get all product from category
  get '/products/from_category/:category_id', to: 'products#from_category'

  # Get all orders from table number
  get 'orders/from_table/:table_number', to: 'orders#from_table'

end
