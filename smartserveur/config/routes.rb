Rails.application.routes.draw do
  resources :tables

  resources :sessions

  resources :orders

  resources :products

  resources :categories
end
