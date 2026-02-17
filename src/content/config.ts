import { defineCollection, z } from 'astro:content';

const pagesCollection = defineCollection({
  type: 'content',
  schema: z.object({
    title: z.string(),
    description: z.string(),
    heroTitle: z.string(),
    heroSubtitle: z.string().optional(),
    heroBadge: z.string().optional(),
  }),
});

const productsCollection = defineCollection({
  type: 'content',
  schema: z.object({
    title: z.string(),
    excerpt: z.string(),
    badge: z.string(),
    badgeColor: z.enum(['red', 'green', 'blue', 'purple', 'orange']),
    logo: z.string().optional(),
    image: z.string().optional(),
    features: z.array(z.object({
      text: z.string(),
    })).optional(),
    screenshots: z.array(z.object({
      image: z.string(),
      alt: z.string(),
    })).optional(),
  }),
});

const settingsCollection = defineCollection({
  type: 'data',
  schema: z.object({
    title: z.string(),
    description: z.string(),
    phone: z.string(),
    email: z.string(),
    address: z.string(),
  }),
});

export const collections = {
  'pages': pagesCollection,
  'products': productsCollection,
  'settings': settingsCollection,
};
