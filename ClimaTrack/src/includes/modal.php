<div class="fade hidden"></div>
<form action="./src/actions/update.php" method="POST" class="modal hidden">
    <header>
        <h2>Trocar de cidade</h2>
        <button type="button" class="button close" aria-label="Fechar">
            <i class="fa-solid fa-x"></i>
        </button>
    </header>
    <div class="form-group">
        <label for="city">Nome da cidade:</label>
        <input type="text" name="city" id="city" placeholder="Digite o nome da cidade" required />
    </div>
    <input type="hidden" id="id" name="update-id" />
    <button class="button search" type="submit">Pesquisar</button>
</form>
