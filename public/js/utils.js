const mediaInput = (Root) => {
  let input = Root.children[0];
  let previewer = Root.children[1];

  let actions = Root.children[3].children;

  let selectFile = actions[0];
  let removeImage = actions[1];

  input.addEventListener("change", () => {
    previewer.src = URL.createObjectURL(event.target.files[0]);
    removeImage.classList.remove("disabled");
    previewer.hidden = false;
  });

  selectFile.addEventListener("click", () => {
    input.click();
    previewer.setAttribute("hidden", false);
  });

  removeImage.addEventListener("click", () => {
    input.value = null;
    removeImage.classList.add("disabled");
    previewer.src = "";
    previewer.setAttribute("hidden", true);
  });
};

const imageInputs = document.getElementsByClassName("media-input");

for (let i = 0; i < imageInputs.length; i++) {
  mediaInput(imageInputs[i]);
}
