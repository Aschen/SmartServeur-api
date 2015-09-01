json.array!(@sessions) do |session|
  json.extract! session, :id, :expired, :table_id
  json.url session_url(session, format: :json)
end
