json.array!(@commandes) do |commande|
  json.extract! commande, :id, :quantite, :produit_id, :session_id
  json.url commande_url(commande, format: :json)
end
