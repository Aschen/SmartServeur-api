json.array!(@tables) do |table|
  json.extract! table, :id, :table_number
  json.url table_url(table, format: :json)
end
