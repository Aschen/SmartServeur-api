json.array!(@sessions) do |session|
  json.extract! session, :id, :numero_table, :expire
  json.url session_url(session, format: :json)
end
