<script>
  import { post } from '../tools.js'

  let question = '';

  function handleSubmit(e) {
    post('create', new FormData(e.target))
  }
</script>

<form on:submit|preventDefault={handleSubmit}>
  <label for="question">Question</label>
  <input bind:value={question} type="text" name="question" id="question">
  <button type="submit">
    Créer une question
  </button>
</form>