<template>
    <section>
        <section id="container" class="container">
            <div class="controls">
                <fieldset class="input-group">
                    <input type="file" accept="image/*" capture="camera" @change="upload"/>
                    <button>Rerun</button>
                </fieldset>
                <fieldset class="reader-config-group">
                    <label>
                        <span>Barcode-Type</span>
                        <select name="decoder_readers">
                            <option value="code_128" selected="selected">Code 128</option>
                            <option value="code_39">Code 39</option>
                            <option value="code_39_vin">Code 39 VIN</option>
                            <option value="ean">EAN</option>
                            <option value="ean_extended">EAN-extended</option>
                            <option value="ean_8">EAN-8</option>
                            <option value="upc">UPC</option>
                            <option value="upc_e">UPC-E</option>
                            <option value="codabar">Codabar</option>
                            <option value="i2of5">Interleaved 2 of 5</option>
                            <option value="2of5">Standard 2 of 5</option>
                            <option value="code_93">Code 93</option>
                        </select>
                    </label>
                    <label>
                        <span>Resolution (long side)</span>
                        <select name="input-stream_size">
                            <option value="320">320px</option>
                            <option value="640">640px</option>
                            <option selected="selected" value="800">800px</option>
                            <option value="1280">1280px</option>
                            <option value="1600">1600px</option>
                            <option value="1920">1920px</option>
                        </select>
                    </label>
                    <label>
                        <span>Patch-Size</span>
                        <select name="locator_patch-size">
                            <option value="x-small">x-small</option>
                            <option value="small">small</option>
                            <option value="medium">medium</option>
                            <option selected="selected" value="large">large</option>
                            <option value="x-large">x-large</option>
                        </select>
                    </label>
                    <label>
                        <span>Half-Sample</span>
                        <input type="checkbox" name="locator_half-sample" />
                    </label>
                    <label>
                        <span>Single Channel</span>
                        <input type="checkbox" name="input-stream_single-channel" />
                    </label>
                    <label>
                        <span>Workers</span>
                        <select name="numOfWorkers">
                            <option value="0">0</option>
                            <option selected="selected" value="1">1</option>
                        </select>
                    </label>
                </fieldset>
            </div>
            <div id="result_strip">
                <ul class="thumbnails"></ul>
            </div>
            <div id="interactive" class="viewport"></div>
            <div id="debug" class="detection"></div>
        </section>
    </section>
</template>

<script>
import Quagga from 'quagga';
export default {
  data() {
  	return {
      config: {
        inputStream: {
          size: 800,
          singleChannel: false
        },
        locator: {
          patchSize: "medium",
          halfSample: true
        },
        decoder: {
          readers: [{
            format: "ean_reader",
            config: {}
          }]
        },
        locate: true,
        src: null
      }
    }
  },
  methods: {
    submit() {
      this.$router.push("/")
    },
    upload(e) {
      const file = e.target.files[0]
      if (file) {
        this.decode(URL.createObjectURL(file));
      }
    },
    decode(src) {
      this.config.src = src
      Quagga.decodeSingle(this.config, (result) => {
      	console.log(result.codeResult.code)
      });
    },
}
}
</script>

<style>
</style>