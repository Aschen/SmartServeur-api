json.array!(@tables) do |table|
  json.extract! table, :id, :numero_table
  json.url table_url(table, format: :json)
end
