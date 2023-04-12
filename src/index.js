import { registerBlockVariation } from "@wordpress/blocks";

import { LineIcon } from "./line-icon";

registerBlockVariation("core/social-link", {
  name: "LINE",
  attributes: { service: "line" },
  title: "LINE",
  label: "LINE",
  icon: LineIcon,
  isActive: (blockAttributes, variationAttributes) =>
    blockAttributes.color === variationAttributes.color,
});
