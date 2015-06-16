json.array!(@produits) do |produit|
  json.extract! produit, :id, :nom, :image, :description, :prix, :categorie_id
  json.url produit_url(produit, format: :json)
end
