class Router {
    /**
     * Metodo inicial.
     *
     * @return {void}.
     */
    constructor(paths) {
        this.paths = paths;
        //this.initRouter();
    }


    load(page) {
        const {paths} = this;
        const {path, middleware} = paths[page] || paths.error;
        location.href = path;
        //console.log(path)
    }

    initRouter() {
        const {
            location: {
                pathname = "/"
            }
        } = window;
        const URI = pathname === "/" ? "/dashboard" : pathname.replace("/", "");
        console.log(URI)
        this.load(URI);
    }
}
