<script>
	import { Link } from "svelte-routing"

  export let id
</script>

<h1>Question {id}</h1>

<Link to="/">
  <small>
    une-question.ch
  </small>
</Link>
