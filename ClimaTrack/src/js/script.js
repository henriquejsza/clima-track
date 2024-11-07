document.addEventListener("DOMContentLoaded", () => {
  const body = document.querySelector("body");
  const modal = document.querySelector(".modal");
  const fade = document.querySelector(".fade");
  const deleteAllButton = document.querySelector(".button.delete-all");
  const filter = document.querySelector(".filter");
  
  // Delegação de evento para os botões de ação
  body.addEventListener("click", (event) => {
    const target = event.target;
    const button = target.closest("button"); // Encontra o botão mais próximo

    if (button) {
      if (button.classList.contains("change-city")) {
        const id = button.value;
        insertIdIntoModal(id);
        toggleModal();
      }

      if (button.classList.contains("delete-city")) {
        const form = button.closest("form.card");
        if (confirm("Deseja mesmo deletar essa cidade?")) {
          form.submit();
        }
      }

      if (button.classList.contains("close")) {
        toggleModal();
      }
    }

    if (target === fade) {
      toggleModal();
    }

    if (target === deleteAllButton) {
      if (confirm("Deseja mesmo deletar tudo?")) {
        location.href = "./src/actions/delete_all.php";
      }
    }
  });

  // Função para alternar visibilidade do modal
  const toggleModal = () => {
    [modal, fade].forEach((element) => element.classList.toggle("hidden"));
  };

  // Função para inserir o ID da cidade no modal
  const insertIdIntoModal = (id) => {
    const inputId = modal.querySelector("input[name='update-id']");
    inputId.value = id;

    // Limpar o campo de entrada da cidade ao abrir o modal
    modal.querySelector("input[name='city']").value = "";
  };

  // Função para exibir ou ocultar o botão "Deletar tudo" e o filtro
  const showDeleteAllButtonAndFilter = () => {
    const container = document.querySelector(".container");
    const isContainerEmpty = container.querySelector(".empty");
    [deleteAllButton, filter].forEach((element) => {
      if (isContainerEmpty) {
        element.classList.add("hidden");
      } else {
        element.classList.remove("hidden");
      }
    });
  };

  // Função para filtrar as cidades
  const filterCities = (event) => {
    const input = event.target.value.toLowerCase();
    const cities = document.querySelectorAll(".card.city");
    cities.forEach((city) => {
      const name = city.querySelector(".name").textContent.toLowerCase();
      city.style.display = name.includes(input) ? "flex" : "none";
    });
  };

  // Função para ajustar a posição do modal
  const setModalPosition = () => {
    modal.style.top = "50%";
    modal.style.left = "50%";
    modal.style.transform = "translate(-50%, -50%)";
  };

  // Eventos de scroll e resize para ajustar a posição do modal
  window.addEventListener("scroll", setModalPosition);
  window.addEventListener("resize", setModalPosition);

  // Inicializa o modal com a posição correta
  setModalPosition();

  // Evento de filtro
  filter.addEventListener("input", filterCities);

  // Exibe ou esconde o botão "Deletar tudo" e o filtro com base na presença de cidades
  showDeleteAllButtonAndFilter();
});

