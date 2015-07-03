Rails.application.routes.draw do
  resources :tables

  resources :sessions

  resources :orders

  resources :products

  resources :categories

  # Get all product from category
  get '/products/from_category/:category_id', to: 'products#from_category'

  # Get all orders from table number not served
  get 'orders/from_table/:table_id', to: 'orders#from_table'

  # Get all orders from table number
  get 'orders/from_table/:table_id/all', to: 'orders#from_table_all'
end
