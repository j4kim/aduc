<script>
	import { Router, Route } from "svelte-routing"
	import Home from "./views/Home.svelte"
	import Question from "./views/Question.svelte"
</script>

<Router>
	<Route path="/" component="{Home}" />
	<Route path=":id" component="{Question}" />
</Router>
