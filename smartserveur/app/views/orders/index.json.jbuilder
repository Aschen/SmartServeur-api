json.array!(@orders) do |order|
  json.extract! order, :id, :quantity, :session_id, :product_id
  json.url order_url(order, format: :json)
end
