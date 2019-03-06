swagger:
	rm -rf static/swagger
	cp -R ./node_modules/swagger-ui-dist static/swagger
	sed -i -e 's/https:\/\/petstore\.swagger\.io\/v2\/swagger\.json/\.\/swagger.json/' static/swagger/index.html
	./node_modules/.bin/json-refs resolve -f documents/swagger/api.yml > static/swagger/swagger.json
