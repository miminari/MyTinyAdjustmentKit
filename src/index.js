import { registerBlockVariation } from "@wordpress/blocks";
import { addFilter } from "@wordpress/hooks";
import { InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";

const VARIATION_NAME = "mta-kit-course";

registerBlockVariation("core/query", {
  name: VARIATION_NAME,
  title: "MTA Kit コース一覧",
  icon: "book",
  description: "コース一覧を表示",
  isActive: ({ namespace, query }) => {
    return namespace === VARIATION_NAME && query.postType === "course";
  },
  attributes: {
    namespace: VARIATION_NAME,
    query: {
      postType: "course",
      perPage: 6,
      offset: 0,
    },
    displayLayout: {
      type: "flex",
      columns: 2,
    },
    innerBlocks: [["core/post-template", {}, [["core/post-title"]]]],
  },
  scope: [ 'inserter' ],
});

const isMTAKitCourseVariation = (props) => {
  const {
    attributes: { namespace },
  } = props;

  return namespace && namespace === VARIATION_NAME;
};

const MTAKitCourseControls = ({ props: { attributes, setAttributes } }) => {
  const { query } = attributes;

  return (
    <PanelBody title="Course Price">
      <SelectControl
        label="コース料金"
        value={query.coursePrice}
        options={[
          { value: "", label: "" },
          { value: 30000, label: "3万円" },
        ]}
        onChange={(value) => {
          setAttributes({
            query: {
              ...query,
              coursePrice: value,
            },
          });
        }}
      />
    </PanelBody>
  );
};

export const withMTAKitCourseControls = (BlockEdit) => (props) => {
  return isMTAKitCourseVariation(props) ? (
    <>
      <BlockEdit {...props} />
      <InspectorControls>
        <MTAKitCourseControls props={props} />
      </InspectorControls>
    </>
  ) : (
    <BlockEdit {...props} />
  );
};

addFilter("editor.BlockEdit", "core/query", withMTAKitCourseControls);
