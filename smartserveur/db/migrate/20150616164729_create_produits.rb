class CreateProduits < ActiveRecord::Migration
  def change
    create_table :produits do |t|
      t.string :nom
      t.string :image
      t.string :description
      t.float :prix
      t.integer :categorie_id

      t.timestamps null: false
    end
  end
end
