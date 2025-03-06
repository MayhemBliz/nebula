module.exports = {
  proxy: "http://nebula.local",
  host: "nebula.local",
  open: "external",
  startPath: "/",
  files: ["style.css", "**/*.php", "main.js"],
  reloadDelay: 500,
  reloadDebounce: 500,
  reloadOnRestart: true,
  notify: false,
  ghostMode: false,
  snippetOptions: {
    rule: {
      match: /<\/body>/i,
      fn: function (snippet, match) {
        return snippet + match;
      }
    }
  }
};