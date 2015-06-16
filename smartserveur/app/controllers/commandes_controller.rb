class CommandesController < ApplicationController
  before_action :set_commande, only: [:show, :edit, :update, :destroy]

  # GET /commandes
  # GET /commandes.json
  def index
    @commandes = Commande.all
  end

  # GET /commandes/1
  # GET /commandes/1.json
  def show
  end

  # GET /commandes/new
  def new
    @commande = Commande.new
  end

  # GET /commandes/1/edit
  def edit
  end

  # POST /commandes
  # POST /commandes.json
  def create
    @commande = Commande.new(commande_params)

    respond_to do |format|
      if @commande.save
        format.html { redirect_to @commande, notice: 'Commande was successfully created.' }
        format.json { render :show, status: :created, location: @commande }
      else
        format.html { render :new }
        format.json { render json: @commande.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /commandes/1
  # PATCH/PUT /commandes/1.json
  def update
    respond_to do |format|
      if @commande.update(commande_params)
        format.html { redirect_to @commande, notice: 'Commande was successfully updated.' }
        format.json { render :show, status: :ok, location: @commande }
      else
        format.html { render :edit }
        format.json { render json: @commande.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /commandes/1
  # DELETE /commandes/1.json
  def destroy
    @commande.destroy
    respond_to do |format|
      format.html { redirect_to commandes_url, notice: 'Commande was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_commande
      @commande = Commande.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def commande_params
      params.require(:commande).permit(:quantite, :produit_id, :session_id)
    end
end
