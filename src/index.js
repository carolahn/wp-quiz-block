// using JSX

wp.blocks.registerBlockType("wp-quiz-block/quiz-block", {
  title: "Quiz Block",
  icon: "smiley",
  category: "common",
  attributes: {
    skyColor: { type: "string" },
    grassColor: { type: "string" },
  },
  edit: function (props) {
    function updateSkyColor(event) {
      props.setAttributes({ skyColor: event.target.value });
    }
    function updateGrassColor(event) {
      props.setAttributes({ grassColor: event.target.value });
    }
    return (
      <div>
        <input
          type="text"
          placeholder="sky color"
          value={props.attributes.skyColor}
          onChange={updateSkyColor}
        />
        <input
          type="text"
          placeholder="grass color"
          value={props.attributes.grassColor}
          onChange={updateGrassColor}
        />
      </div>
    );
  },
  save: function (props) {
    return null;
    // return (
    //   <div>
    //     <p>
    //       Today the sky is {props.attributes.skyColor} and the grass is{" "}
    //       {props.attributes.grassColor}.
    //     </p>
    //   </div>
    // );
  },
});
