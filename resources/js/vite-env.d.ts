/// <reference types="vite/client" />

declare module "*.css" {
  const content: Record<string, any>;
  export default content;
}

declare module "*?raw" {
  const content: string;
  export default content;
}
